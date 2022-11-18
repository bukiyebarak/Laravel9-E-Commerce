<label  >İL<span class="required">*</span></label>
<select id="city">
    <option value="">İl Seçiniz</option>
    @foreach($getcity as $rs)
        <option value="{{$rs->sehir_key}}">{{$rs->sehir_title}}</option>
    @endforeach
</select>
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;

<label  >İLÇE <span class="required">*</span></label>
<select id="district">
    <option value="">İlçe Seçiniz</option>
</select>

&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
<label >MAHALLE <span class="required">*</span></label>
<select id="neighbourhood">
    <option value="">Mahalle Seçiniz</option>
</select>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    jQuery(document).ready(function (){
        jQuery('#city').change(function (){
            let cid=jQuery(this).val();
           jQuery('#neighbourhood').html('<option value="">Mahalle Seçiniz</option>')
            jQuery.ajax({
                url:'/getDistrict',
                type:'post',
                data:'cid='+cid+'&_token={{csrf_token()}}',
                success:function (result){
                    jQuery('#district').html(result)
                }
            });
        });

        jQuery('#district').change(function (){
            let did=jQuery(this).val();
            jQuery.ajax({
                url:'/getNeighbourhood',
                type:'post',
                data:'did='+did+'&_token={{csrf_token()}}',
                success:function (result){
                    jQuery('#neighbourhood').html(result)
                }
            });
        });
    });
</script>
