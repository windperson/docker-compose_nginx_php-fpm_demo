vcl 4.0;

#default php api backend
backend default {
  .host = "normal_site";
  .port = "80";
}

acl all_purge {
  "localhost";
  #"admin";
}
sub vcl_recv {
  if (req.method == "PURGE") {
    if (!client.ip ~ all_purge) {
      return(synth(405,"Not allowed."));
    }
    return (purge);
  }

  #Exlcude from cache
  if (req.url ~ "^/redis_counter/"){
    return(pass);
  }
  if (req.url ~ "^/read_data/"){
    return(pass);
  }
  if (req.url ~ "^/opcache*"){
    return(pass);
  }
}
