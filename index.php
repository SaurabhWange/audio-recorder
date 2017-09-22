<!DOCTYPE html>
<html>
    
    <head>
        <title>Audio recorder app</title>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    </head>
    
    <body>
<div>
		<h2>Audio record and playbackkkk</h2>
		<p>
			<button type="button" onclick="startRecord()" >start</button>
			<button type="button" onclick="stopRecord()">stop</button>
		</p>	
		<p>
			<audio id="recordedAudio"></audio> 
			<a id="audioDownload"></a>
			<button type="button" onclick="play()"> Play </button>
		</p>
</div>
        
    
    <script type="text/javascript">

       navigator.getUserMedia  = navigator.getUserMedia ||
                          navigator.webkitGetUserMedia ||
                          navigator.mozGetUserMedia ||
                          navigator.msGetUserMedia; 
                         
                         
        
        if( navigator.getUserMedia   ){
                                            
navigator.mediaDevices.getUserMedia({audio:true})
	.then(   function(stream)  {

		rec = new MediaRecorder(stream);
		rec.ondataavailable = function(e)  {
			audioChunks.push(e.data);
			if (rec.state == "inactive"){
        var blob = new Blob(audioChunks,{type:'audio/x-mpeg-3'});
        recordedAudio.src = URL.createObjectURL(blob);
        recordedAudio.controls=true;
       // recordedAudio.autoplay=true;
        audioDownload.href = recordedAudio.src;
        audioDownload.download = 'mp3';
        audioDownload.innerHTML = 'download';
     }
		}
	})
	.catch( function(e){ console.log(e) });
  
	function startRecord( e ) {

  audioChunks = [];
  rec.start();
}
        }else{
            alert("Browser does not support audio recording ");
        }

	function stopRecord( e ) {

  rec.stop();


}
 function play(){

 	recordedAudio.play() ;
 }
    </script>
    </body>
</html>