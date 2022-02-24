<div class="col-md-6">
  <select id="searchAjax" class='form-control col-lg-5 itemSearch'></select>
</div>


<script type="text/javascript">
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

	  $(document).ready(function(){
      $("#searchAjax").select2({
      	placeholder: "Personel ara",
      	minimumInputLength: 3,
         ajax: { 
           url: '<?php echo base_url(); ?>settings/ajax_person',
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
	                results: $.map(data['person'], function (item) {
	                    return {
                        text: item.path ? "<img style='width: 50px;' class='flag' src='"+ getBaseUrl() + item.path + "'/> "  + item.ad + ' ' + item.soyad 
	                        : '<i style="font-size:15px;" class="mdi mdi-account"></i> ' + item.ad + ' ' + item.soyad,
	                        id: item.tckn,
	                    }
	                })
            	};
        	},

        	success : function(data)
	        {   
	            csrfHash = data['csrf'].csrfHash;
	        }  
         },

       
	    escapeMarkup: function (m) { return m; } // we do not want to escape markup since we are displaying html in results
     });
   });
</script>
