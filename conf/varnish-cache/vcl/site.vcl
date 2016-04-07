vcl 4.0;

#default php api backend
backend default {
  .host = "normal_site";
  .port = "80";
}

sub vcl_recv {

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
