(function(m,g){m.HAPRadioData=function(h,D){function E(){var a=k.path;";"==a.substring(a.length-1)&&(a=a.substring(0,a.length-1));"/"==a.substring(a.length-1)&&(a=a.substring(0,a.length-1));if(h.enableCors){m.radioDataXHR&&m.radioDataXHR.abort();var e=new XMLHttpRequest;e.onerror=function(b){};e.onreadystatechange=function(){if(4===this.readyState){if(200===this.status){if(k.version&&1==k.version)var b=e.responseText.split(","),c=b[6];else b=JSON.parse(e.responseText),c=b.songtitle;y=b;var f=c.split("-");
b=g.trim(f[0]);f=g.trim(f[1]);l={artist:b,title:f,thumb:null};q?q!=c?h.getRadioArtwork?u(b,f):p||g(r).trigger("HAPRadioData.DATA_READY",l):console.log("data hasnt changed"):h.getRadioArtwork?u(b,f):p||g(r).trigger("HAPRadioData.DATA_READY",l)}q=c}else w||(n&&clearInterval(n),n=setInterval(function(){E()},A))};if(k.version&&1==k.version)e.open("GET",x[v]+a+"/7.html",!0);else{var d=h.sid||"1";e.open("GET",x[v]+a+"/stats?sid="+d+"&json=1",!0)}e.send();m.radioDataXHR=e}else d=k.sid||"1",g.ajax({dataType:"jsonp",
url:a+"/stats?sid="+d+"&json=1",success:function(b){console.log(b);var c=b.songtitle;y=b;var f=b.songtitle.split("-");b=g.trim(f[0]);f=g.trim(f[1]);l={artist:b,title:f,thumb:null};q?q!=c?h.getRadioArtwork?u(b,f):p||g(r).trigger("HAPRadioData.DATA_READY",l):console.log("data hasnt changed"):h.getRadioArtwork?u(b,f):p||g(r).trigger("HAPRadioData.DATA_READY",l);q=c},error:function(){console.log("Error getShoutcastData")}})}function C(){var a=k.path;";"==a.substring(a.length-1)&&(a=a.substring(0,a.length-
1));"/"==a.substring(a.length-1)&&(a=a.substring(0,a.length-1));m.radioXHR&&m.radioXHR.abort();var e=new XMLHttpRequest;e.onerror=function(d){};e.onreadystatechange=function(){if(4===this.readyState)if(200===this.status){if(-1<this.responseText.indexOf('{"icestats":')){var d=JSON.parse(this.responseText);if(void 0===d.icestats.source.length)var b=d.icestats.source;else{var c,f=d.icestats.source.length;for(c=0;c<f;c++)if(0<=d.icestats.source[c].listenurl.indexOf(k.mountpoint)){b=d.icestats.source[c];
break}}y=b;if(b.yp_currently_playing)var t=b.yp_currently_playing;else d=b.artist,b=b.title,d&&b?t=d+"-"+b:b&&(t=b)}else-1<this.responseText.indexOf('class="streamdata"')?-1<this.responseText.indexOf("Mount Point /"+k.mountpoint)&&(b=this.responseText.substr(this.responseText.indexOf("Mount Point /"+k.mountpoint)),b=b.substr(b.indexOf("Current Song:")),b=b.substr(b.indexOf('<td class="streamdata">')+23),b=b.substr(0,b.indexOf("</td>")),HAPUtils.isEmpty(b)||(t=b)):-1<this.responseText.indexOf('class="streamstats"')&&
-1<this.responseText.indexOf("Mount Point /"+k.mountpoint)&&(b=this.responseText.substr(this.responseText.indexOf("Mount Point /"+k.mountpoint)),b=b.substr(b.indexOf("Currently playing:")),b=b.substr(b.indexOf('<td class="streamstats">')+24),b=b.substr(0,b.indexOf("</td>")),HAPUtils.isEmpty(b)||(t=b));t?(b=t.split("-"),d=g.trim(b[0]),b=g.trim(b[1]),l={artist:d,title:b,thumb:null},q?q!=t&&(h.getRadioArtwork?u(d,b):p||g(r).trigger("HAPRadioData.DATA_READY",l)):h.getRadioArtwork?u(d,b):p||g(r).trigger("HAPRadioData.DATA_READY",
l),q=t):(l={artist:F,title:G,thumb:null},p||g(r).trigger("HAPRadioData.DATA_READY",l))}else 404==this.status&&"Not Found"==this.statusText?(console.log(B[z]+" does not exist!"),z++,B[z]?w||(n&&clearInterval(n),C()):(l={artist:F,title:G,thumb:null},p||g(r).trigger("HAPRadioData.DATA_READY",l))):w||(n&&clearInterval(n),n=setInterval(function(){C()},A))};h.enableCors?e.open("GET",x[v]+a+B[z],!0):e.open("GET",a+B[z],!0);e.send();m.radioXHR=e}function H(){m.radioDataXHR&&m.radioDataXHR.abort();var a=new XMLHttpRequest;
a.onerror=function(d){};a.onreadystatechange=function(){if(4===this.readyState)if(200===this.status){var d=JSON.parse(a.responseText),b=d.artist,c=d.title,f=b+" - "+c,t=d.thumb||null;y=d;l={artist:b,title:c,thumb:t};q?q!=f&&(h.getRadioArtwork&&null==t?u(b,c):p||g(r).trigger("HAPRadioData.DATA_READY",l)):h.getRadioArtwork&&null==t?u(b,c):p||g(r).trigger("HAPRadioData.DATA_READY",l);q=f}else w||(n&&clearInterval(n),n=setInterval(function(){H()},A))};var e="http://www.radiojar.com/api/stations/"+k.mountpoint+
"/now_playing/";h.enableCors?a.open("GET",x[v]+e,!0):a.open("GET",e,!0);a.send();m.radioDataXHR=a}function u(a,e){if(!p){a=I(a);e=J(e);var d=x[v]+"https://itunes.apple.com/search?type=jsonp&term=="+encodeURI(a)+"-"+encodeURI(e)+"&media=music&limit=1",b=new XMLHttpRequest;b.onerror=function(c){};b.onreadystatechange=function(){if(4===this.readyState)if(200===this.status){var c=JSON.parse(this.responseText);if(c.resultCount){var f=D.width();f=HAPUtils.closestNumber(h.artworkSize,f);c=c.results[0].artworkUrl100.replace("100x100",
f+"x"+f)}else c=k.thumbDefault;l.thumb=c;p||g(r).trigger("HAPRadioData.DATA_READY",l);n&&clearInterval(n);n=setInterval(function(){r.getData()},A);w=!0}else 403===this.status&&(v++,v>x.length-1&&(v=0),u(a,e))};b.open("GET",d,!0);b.send();m.artworkDataXHR=b}}function I(a){a=a.toLowerCase();a=g.trim(a);a.includes("&")?a=a.substr(0,a.indexOf(" &")):a.includes("feat")?a=a.substr(0,a.indexOf(" feat")):a.includes("ft.")&&(a=a.substr(0,a.indexOf(" ft.")));return a}function J(a){a=a.toLowerCase();a=g.trim(a);
a.includes("&")?a=a.replace("&","and"):a.includes("(")?a=a.substr(0,a.indexOf(" (")):a.includes("ft")&&(a=a.substr(0,a.indexOf(" ft")));return a}var r=this;HAPUtils.isMobile();var k,y,l,q,w,p,B=["/status-json.xsl","/status.xsl"],z=0,x=h.cors.split(",").map(function(a){return a.trim()}),v=0,n,A=h.lastPlayedInterval,F=h.defaultSongArtist,G=h.defaultSongTitle;0==D.length&&(h.getRadioArtwork=!1);this.getData=function(a){a&&(k=a);p=!1;"shoutcast"==k.type?E():"icecast"==k.type?C():"radiojar"==k.type?H():
console.log("HAPRadioData unknown radio data!")};this.destroy=function(){p=!0;n&&clearInterval(n);n=null;m.radioDataXHR&&(m.radioDataXHR.abort(),delete m.radioDataXHR);m.artworkDataXHR&&(m.artworkDataXHR.abort(),delete m.artworkDataXHR);v=0;w=!1;q=null};this.getRadioData=function(){return y}}})(window,jQuery);