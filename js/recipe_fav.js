$(function(){
    $('body').on('click', '#addFav', function(e){
      var type = $(this).data('type');
      if (type == "car"){
        var postData = { car_id: $(this).data('id') };
      }else{
        var postData = { part_id: $(this).data('id') };
      }
      $.ajax({
        method: "POST",
        url: "./ajax/togglefav.php",
        dataType: "json",
        data: postData
      }).done(function(returnData){
          console.log(returnData);
          $('#addFav').text('Remove from favourites').attr('id', 'removeFav');
      });
    });

    $('body').on('click', '#removeFav', function(e){
      var type = $(this).data('type');
      if (type == "car"){
        var postData = { car_id: $(this).data('id') };
      }else{
        var postData = { part_id: $(this).data('id') };
      }
      $.ajax({
        method: "POST",
        url: "./ajax/togglefav.php",
        dataType: "json",
        data: postData
      }).done(
        function(returnData){
          console.log(returnData);
          $('#removeFav').text('Add to favourites').attr('id', 'addFav');
      });
    });
});
