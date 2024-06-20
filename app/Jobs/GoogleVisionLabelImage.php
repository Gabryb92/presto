<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionLabelImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $article_image_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Cerchiamo immagine da controllare tramite il suo id
        $i = Image::find($this->article_image_id);

        if(!$i){
            return;
        }
        //L'immagine viene cercata nella cartella public tramite il path che recuperiamo dall'id con la funzione file_get_contents
        $image = file_get_contents(storage_path('app/public/' . $i->path));
        //Aggiungiamo i dati della api google all'env
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->labelDetection($image);
        $labels = $response->getLabelAnnotations();

        if($labels){
            $result = [];
            foreach($labels as $label){
                //Salviamo i tag nel result
                $result[] = $label->getDescription();
            }

            $i->labels = $result;

            $i->save();
        }

        $imageAnnotator->close();
    }
}
