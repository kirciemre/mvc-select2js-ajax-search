<div class="col-md-6">
  <select id="searchAjax" class='form-control col-lg-5 itemSearch' type='text' placeholder='select item' /></select>
</div>

<script type="text/javascript">
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
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
              };
           },
           processResults: function (data) {
            return {
	                results: $.map(data, function (item) {
	                    return {
	                        text: item.personel_ad + " " + item.personel_soyad,
	                        id: item.personel_tc
	                    }
	                })
            	};
        	}
         },
     });
   });
</script>