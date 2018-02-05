var fs = require('fs');
var https = require('https');

fs.writeFile(__dirname + '/index.html',"<h1>HTML is great</h1>", function(error){
   if(error){
      return console.log(error);
   }
   else{
      console.log('Congrats');
   }
});

var myPhotoLocation =  'https://cdn57.androidauthority.net/wp-content/uploads/2018/01/Google-Assistant-booth-CES-2018-AA-14-840x560.jpg';

https.get(myPhotoLocation, function(response){
   response.pipe(fs.createWriteStream(__dirname + "/mydog.jpg"));
});
