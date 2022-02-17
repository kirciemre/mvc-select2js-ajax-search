<div class="col-md-6">
  <select id="searchAjax" class='form-control col-lg-5 itemSearch' type='text' placeholder='select item' /></select>
</div>

<script type="text/javascript">
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
	  $(document).ready(function(){
      $("#searchAjax").select2({
      	minimumInputLength: 3,
         ajax: { 
           url: '<?php echo base_url(); ?>turne/ajax_person',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                searchTerm: params.term, // search term add CSRF Token
                '<?php echo $this->security->get_csrf_token_name(); ?>': csrfHash
              };
           },
           processResults: function (data) {
            return {
	                results: $.map(data, function (item) {
	                    return {
	                        text: item['person'].personel_ad + " " + item['person'].personel_soyad,
	                        id: item['person'].personel_tc
	                    }
	                })
            	};
        	},
          success : function(data)
	        {   
	            csrfHash = data['csrf'].csrfHash;
	        }  
         },
     });
   });
</script>