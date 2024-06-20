<form action="{{route('set_language_locale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="nav-link" style='background-color: transparent; border: none;'>
        <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="20" height="20" alt="">
    </button>
</form>