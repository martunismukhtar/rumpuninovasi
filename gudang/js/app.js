var App_ = function () {
    "use strict";
    var _urlload, _laodingclass, _limit, _cloadtabel, _data;
    
    function loaddata($data){

        $.ajax({
            url: base + _urlload,
            type: "POST", data: _data,
            dataType: "json",
            beforeSend: function () {
                $('.'+_laodingclass).modal('show');
            },
            success: function (databack) {

                $('.'+_cloadtabel).html(databack['html']).fadeIn(500);
                
                $('.'+_laodingclass).modal('hide');

                $('.getpag' ).html(databack['tp_']);
            }
        });
    }
    
    var runDefault = function($data){
        _urlload=$data['loadingdata']['url_loading'];
        _laodingclass=$data['loadingdata']['laodingclass'];
        _data=$data['loadingdata']['data'];
        _cloadtabel=$data['loadingdata']['_cload'];
        
//        $(document).on('click','.hapuspencarian',function(){
//            cari='';
//            $('.cari').val('');
//            loaddata(0);
//        });
        
        $(document).on('change','.getpag',function(){
            
            $.extend(_data, {'hal' : $(this).val()});    
            loaddata();
        });
        
        
        $('.cari').keyup(function(e){
            if($(this).val().length>=3) {
                $.extend(_data, {'vx' : $(this).val()});    
                $.extend(_data, {'hal' : 0});    
                loaddata();
            }
        });
        
        
    };

    var simpan= function($data){
        
        $($data['simpan']['form']).submit(function (e) {
            e.preventDefault();
            
            $.ajax({
                url:$data['simpan']['url'],data:$('#form').serialize(),
                type:'post',dataType : "json",
                beforeSend: function() {
                    $($data['simpan']['btnadd']).button('loading');
                },
                success: function(databack){
                    $($data['simpan']['btnadd']).button('reset');
            
                    if(databack['s_']===0) {
                        if(typeof databack['target']!=='undefined') {
                            $('.'+databack['target']).addClass(databack['cls']);
                        
                        }
                        swal({
                            type: "warning", title: "", text: databack['m_'], confirmButtonColor: "#007AFF"
                        });
                    } else 
                        if(databack['s_']===2){
                        swal({
                            type: "warning", title: "", text: databack['m_'], confirmButtonColor: "#007AFF"
                        });
                    } 
                    else {
                        $('.modaledit').modal('hide');
                        swal({
                            title: databack['m_'],
                            type: "success",
                            confirmButtonColor: "#007AFF"
                        });
                        $('#form')[0].reset();  
                        
                        //clear select2
                        if($data['simpan']['clearform']){
                            for (var k in $data['simpan']['clearform']) {
                                
                                $('.'+$data['simpan']['clearform'][k]).val(null).trigger("change");
                                
                            }//$("select").val('').change();
//                            $("select").val('').change();
                        }

                        loaddata();
                    }
             
                }
            });
          
        });
        
    };
    var simpanedit = function ($data){
        $(document).on('submit','.fedit',function(e){
            e.preventDefault();
            
            $.ajax({
                url:$data['edit']['url'],data:$('.fedit').serialize(),
                type:'post',dataType : "json",
                beforeSend: function() {
                    $($data['edit']['btnedit']).button('loading');
                },
                success: function(databack){
//                    alert('kkk')
                    $($data['edit']['btnedit']).button('reset');
//                    
                    if(databack['s_']===0) {
                        if(typeof databack['target']!=='undefined') {
                            $('.'+databack['target']).addClass(databack['cls']);
                        
                        }
                        swal({
                            type: "warning", title: "", text: databack['m_'], confirmButtonColor: "#007AFF"
                        });
                    } 
                    else 
                        if(databack['s_']===2){
                            $('.modaledit').modal('hide');
                        swal({
                            type: "warning", title: "", text: databack['m_'], confirmButtonColor: "#007AFF"
                        });
                    } 
                    else 
                        {
//                            alert('AApam')
                       $('.modaledit').modal('hide');
                       loaddata();
                       swal({
                            title: databack['m_'],
                            type: "success",
                            confirmButtonColor: "#007AFF"
                        });
                        
                    } 

             
                }
            });

        });
    };
    return {
        //main function to initiate template pages
        init: function ($data) {
            runDefault($data);
            simpan($data);
            simpanedit($data);

        }, initpagging:function($data){
            runDefault($data);
            
        }, edit:function(judulheader, url, xx, addplugin){
            $('.modaledit').modal('show');
            $('.judulheaderedit ').html(judulheader);
            $('.bodyedit').html('Sedang mengunduh data');
//            alert(addplugin['select2'][0]['klas'])
            $.ajax({
                url:url,data:xx,
                type:'post',dataType : "json",
                beforeSend: function() {
//                $('.loadingsimpan').modal('show');
                },
                success: function(databack){
                    $('.bodyedit').html(databack['msg']);
                    
                    if(addplugin['select2']){
                        for (var k in addplugin['select2']) {
                            if (addplugin['select2'].hasOwnProperty(k)) {
                            
                                if(!addplugin['select2'][k]['url']){
                                    $('.'+addplugin['select2'][k]['klas']).select2({minimumResultsForSearch: Infinity, width:'100%'});
                                } else {
                                    $('.'+addplugin['select2'][k]['klas']).select2({
                                        placeholder:'Pilih dosen',
                                        ajax: {
                                            url: addplugin['select2'][k]['url'],
                                            dataType: 'json',
                                            delay: 250,
                                            data: function (params) {
                                                return {
                                                    q: params.term,
                                                    page: params.page
                                                };
                                            },
                                            processResults: function (data, params) {
                                                params.page = params.page || 1;
                                                
                                                return {
                                                    results: data.items,
                                                    pagination: {
                                                        more: (params.page * 30) < data.total_count
                                                    }   
                                                };
                                            },
                                            cache: true
                                        }
                                    });
                                }
                            }
                        }
                    }
                    
                    
                    if(addplugin['datepicker']){
                        $('.'+addplugin['datepicker']).datepicker({
                            autoclose: true,
                            todayHighlight: true
                        });
                    }
                    
                }
            });
        }, hapus:function(url, data, url_loaddata){

            swal({
                title: "Apakah anda yakin?",
                text: "Data yang sudah dihapus tidak bisa dikembalikan lagi!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, hapus data!",
                cancelButtonText: "Tidak, batalkan hapus!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url,data: data,
                        type: 'post', dataType: "json",
                        success: function (databack) {
                            if(databack['s_']===0) {
                                swal("Cancelled", databack['m_'], "error");
                            } else {
                                swal("Deleted!", "Data telah dihapus.", "success");
                                
                                loaddata();
                            }
                        
                        }
                    });
                
                } else {
                    swal("Cancelled", "Data tidak dihapus.", "error");
                }
            });
        }, load_:function(hal){
            $.extend(_data, {'hal' : hal});  
            loaddata();
            
            
        }, xload:function(data){
            $.extend(_data, data);  
            loaddata();
            
        }, hapus_:function(data, url){
            swal({
                title: "Apakah anda yakin?",
                text: "Data yang sudah dihapus tidak bisa dikembalikan lagi!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, hapus data!",
                cancelButtonText: "Tidak, batalkan hapus!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url,data: data,
                        type: 'post', dataType: "json",
                        success: function (databack) {
                            if(databack['s_']===0) {
                                swal("Cancelled", databack['m_'], "error");
                            } else {
                                swal("Deleted!", "Data telah dihapus.", "success");
                                
                                loaddata();
                            }
                        
                        }
                    });
                
                } else {
                    swal("Cancelled", "Data tidak dihapus.", "error");
                }
            });
        }
    };
}();

function next(hal,tbl,idtbl) {
    
    App_.load_(hal);
}
function prev(hal,tbl,idtbl) {
    App_.load_(hal);
}
