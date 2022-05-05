
<script>


	 var pusher = new Pusher('a83f0f6ec57ddadcbafc', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('comman', function(data) {
		console.log(data);
       var userid = data['message']['userid'];
       var session_id = "<?php echo $this->session->userid ?>";
		
       if(userid == session_id){
          
            location.reload();


       }

    });
	



</script>

</body>
</html>