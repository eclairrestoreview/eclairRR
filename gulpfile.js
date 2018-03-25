var elixir = require('laravel-elixir');

elixir(mix => {
  mix.sass('app.scss')
   .webpack('app.js')
      .copy('semantic/dist/semantic.min.css', 'public/css/semantic.min.css')
      .copy('semantic/dist/semantic.min.js', 'public/js/semantic.min.js');
});