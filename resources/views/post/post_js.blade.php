
</script>
        <script>
            $(document).ready(function(){
                $(document).on('click','.pagination a',function(e){
                   e.preventDefault();
                   let page=$(this).attr('href').split('page=')[1]
                   post(page)

                  })
                  function post(page){
                   $.ajax({
                       url:"/pagination/paginate-data?page="+page,
                       success:function(res){
                           $('.card-body').html(res);

                       }

                   })
                  }

            //Search function
            $(document).on('keyup',function(e){
               e.preventDefault();
               let search_string = $('#search').val();
               $.ajax({
                url::{{route('search.post')}},
                method:'GET',
                data:{search_string:search_string},
                success:function(res){
                    $('.card-body').html(res);
                }

               });
              })

           });


    </script>

