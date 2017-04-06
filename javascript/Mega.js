(function(window){

  var Mega = {
    version : '0.0.1'
  };

  Mega.get = function(url, hash) {
    if (hash.load && hash.view) {
      var rep = url.replace('/', '#');
      if(rep === window.location.hash){
      Mega.ajax(hash.load, function(html){
        var view = document.querySelector(hash.view);
        view.innerHTML = html;
      });
    }
    }

  };

  Mega.route = function(uri) {
    var url = 'public/' + (uri.url ==='' ) ? 'home' : uri.url.substring(1) );
    Mega.ajax(url + '.php', function(html){
      var view = document.querySelector(uri.view);
      view.innerHTML = html;
    });
  }

  Mega.ajax = function(url, callback){

    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, false);
    xhr.send(null);
    callback(xhr.responseText);
  }

  window.Mega = Mega;
}(window));
