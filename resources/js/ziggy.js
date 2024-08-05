const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"],"parameters":["token"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"password.confirm":{"uri":"user\/confirm-password","methods":["POST"]},"two-factor.login":{"uri":"two-factor-challenge","methods":["GET","HEAD"]},"two-factor.enable":{"uri":"user\/two-factor-authentication","methods":["POST"]},"two-factor.confirm":{"uri":"user\/confirmed-two-factor-authentication","methods":["POST"]},"two-factor.disable":{"uri":"user\/two-factor-authentication","methods":["DELETE"]},"two-factor.qr-code":{"uri":"user\/two-factor-qr-code","methods":["GET","HEAD"]},"two-factor.secret-key":{"uri":"user\/two-factor-secret-key","methods":["GET","HEAD"]},"two-factor.recovery-codes":{"uri":"user\/two-factor-recovery-codes","methods":["GET","HEAD"]},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"]},"other-browser-sessions.destroy":{"uri":"user\/other-browser-sessions","methods":["DELETE"]},"current-user-photo.destroy":{"uri":"user\/profile-photo","methods":["DELETE"]},"current-user.destroy":{"uri":"user","methods":["DELETE"]},"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"search":{"uri":"search","methods":["GET","HEAD"]},"search.movies":{"uri":"search\/{query}","methods":["GET","HEAD"],"parameters":["query"]},"get.movie":{"uri":"movie\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"get.comments":{"uri":"movie\/{movie}\/comments","methods":["GET","HEAD"],"parameters":["movie"],"bindings":{"movie":"id"}},"add.comment":{"uri":"movie\/{movie}\/comments","methods":["POST"],"parameters":["movie"],"bindings":{"movie":"id"}},"delete.comment":{"uri":"comments\/{comment}","methods":["DELETE"],"parameters":["comment"],"bindings":{"comment":"id"}},"get.actors":{"uri":"movie\/{movie}\/actors","methods":["GET","HEAD"],"parameters":["movie"],"bindings":{"movie":"id"}},"get.user":{"uri":"user\/{user}","methods":["GET","HEAD"],"parameters":["user"],"bindings":{"user":"id"}},"get.movielist.form":{"uri":"movielist\/form","methods":["GET","HEAD"]},"add.movielist":{"uri":"create\/movielist","methods":["POST"]},"get.movielist":{"uri":"movielist\/{movie_list}","methods":["GET","HEAD"],"parameters":["movie_list"],"bindings":{"movie_list":"id"}},"delete.movielist":{"uri":"movielist\/{movie_list}","methods":["DELETE"],"parameters":["movie_list"],"bindings":{"movie_list":"id"}},"add.movie.movielist":{"uri":"movielist\/{list_id}\/movie\/{movie_id}","methods":["POST"],"parameters":["list_id","movie_id"]},"delete.movie.movielist":{"uri":"movielist\/{list}\/movie\/{movie}","methods":["DELETE"],"parameters":["list","movie"],"bindings":{"list":"id","movie":"id"}}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
