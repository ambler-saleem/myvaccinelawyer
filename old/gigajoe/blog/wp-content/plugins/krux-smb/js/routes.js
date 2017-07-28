window.KWP.router = Backbone.Router.extend({
  routes: {
    '' : 'home',
    'get-started' : 'getStarted',
    'have-account' : 'haveAccount',
    'social' : 'social'
  },
  home: function ( ) {
    new window.KWP.views.social;
  }
});