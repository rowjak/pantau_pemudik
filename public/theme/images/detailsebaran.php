                $('.detailsebatan'). function (){

                    if ( $.fn.DataTable.isDataTable('#dtlsebaran') ) {
                        $('#dtlsebatan').DataTable().destroy();
                    }
                    $('#dtlsebaran tbody').empty();

                    $.get( "{{url('api/getData')}}", function( data ) {

                    for (var i = 0; i < data.kecamatan.length; i++) {
                    append('<tr><td>'+data.kecamatan[i].nama_kecamatan+'</td><td>'+data.kecamatan[i].odp+'</td><td>'+data.kecamatan[i].odp.selesai+'</td><td>'+data.kecamatan[i].pdp.dirawat+'</td><td>'+data.kecamatan[i].pdp.selesai+'</td><td>'+data.kecamatan[i].pdp.sembuh+'</td><td>'+data.kecamatan[i].pdp.meninggal+'</td><td>'+data.kecamatan[i].positif.dirawat+'</td><td>'+data.kecamatan[i].positif.sembuh+'</td><td>'+data.kecamatan[i].positif.meninggal+'</td></tr>');
                    }

                        $('#dtlsebatan').DataTable({
                            "pageLength": 20,
                            "lengthChange": false,
                            "order": [[ 2, "desc" ]]
                        });
                    });
                }