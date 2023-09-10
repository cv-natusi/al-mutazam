<div class="card mb-3" style="width: 100%; background-color:#ffffff">
    <div class="card-header bg-card">	
        <h5 class="text-card">DATA PENDIDIKAN DAN PEKERJAAN</h5>
    </div>
    <div class="card-body">
        <form class="formDataPendidikan">
            <input type="hidden" name="id" id="id" value="{{!empty($data)?$data->id_guru:''}}">
            <div class="row mb-3">
                <div class="col-md-8">
                    <label>Mata Pelajaran Yang Diajar</label>
                    <select class="form-control" id="mata_pelajaran" name="mata_pelajaran">
                        <option value="">.:: Pilih ::.</option>
                        @if (count($pelajaran)>0)
                            @foreach ($pelajaran as $p)
                                <option id="opt_{{$p->id_pelajaran}}" value="{{$p->id_pelajaran}}">{{$p->nama_mapel}}</option>
                            @endforeach
                        @endif
                    </select>
                    <input type="hidden" name="sIdMapel" id="sIdMapel">
                </div>
                <div class="col-md-2">
                    <label>Jumlah Jam <small>*</small></label>
                    <input autocomplete="off" class="form-control" type="number" name="jumlah_jam" id="jumlah_jam" value="{{ !empty($data->jumlah_jam)? $data->jumlah_jam : ''}}" placeholder="0">
                </div>
                <div class="col-md-2">
                    <button type="button" style="margin-top: 20px;" class="btn btn-primary" id="btnAddMapel" onclick="addMapel()">ADD</button>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <table class="table" id="tableMapel" style="font-size: 12px;">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Nama Mata Pelajaran</th>
                                <th scope="col">Jumlah Jam</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tempatData">
                            @if (!empty($dataMapel)&&$dataMapel[0]->id_detail_data_pendidikan != '')
                                @foreach($dataMapel as $index => $val)
                                <tr id="mapel_{{$val->id_pelajaran}}">
                                    <td id="td_nama_mapel_{{$val->id_pelajaran}}">{{$val->nama_mapel}}</td>
                                    <td id="td_jumlah_jam_{{$val->id_pelajaran}}">{{$val->jumlah_jam}}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-warning mr-2" onclick="editMapel(`{{$val->id_pelajaran}}`)"><i class="bx bxs-edit"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-danger" onclick="deleteMapel(`{{$val->id_pelajaran}}`)"><i class="bx bxs-trash"></i></a>
                                    </td>
                                </tr>
                                <input type="hidden" class="hps_{{$val->id_pelajaran}}" id="rnama_mapel_{{$val->id_pelajaran}}" name="mata_pelajaran[]" value="{{$val->id_pelajaran}}">
                                <input type="hidden" class="hps_{{$val->id_pelajaran}}" id="rjumlah_jam_{{$val->id_pelajaran}}" name="jumlah_jam[]" value="{{$val->jumlah_jam}}">
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Potensi Bidang</label>
                    <select name="potensi_bidang" id="potensi_bidang" class="form-control">
                        <option value="">.:: Pilih ::.</option>
                        <option value="potensi">Potensi Bidang</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>No. Sertifikat Pendidik</label>
                    <input type="text" name="no_sertifikat_pendidik" id="no_sertifikat_pendidik" placeholder="No. Sertifikat Pendidik" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Sertifikasi</label>
                    <input type="text" name="sertifikasi" id="sertifikasi" placeholder="Sertifikasi" class="form-control">
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        {{-- <button class="btn btn-secondary editDataPendidikan" type="button">EDIT</button> --}}
        <button class="btn btn-success simpanDataPendidikan" type="button">SIMPAN</button>
    </div>
</div>
<script type="text/javascript">
    $('#mata_pelajaran').change(() => {
        var id = $('#mata_pelajaran').val();
        $('#sIdMapel').val(id);
    });

    function addMapel() {
        var btn = $('#btnAddMapel').html()
        var id = $('#sIdMapel').val();
        var cPelajaranId = $('input[name^="mata_pelajaran"]');
        var error = 0;
        for (var i=0;i < cPelajaranId.length;i++) {
            if (cPelajaranId[i].value == id) {
                error += 1;
            }
        };
        var idMapel = $('#mata_pelajaran').val();
        var nama = $('#mata_pelajaran').text();
        var jumlah = $('#jumlah_jam').val();
        if (btn == 'ADD') {
            if (error == 0) {
                if (!id) { 
                    swal('Maaf!','Kolom Mata Pelajaran Harus diisi','warning')
                } else if (!nama) { 
                    swal('Maaf!','Kolom Mata Pelajaran Harus diisi','warning')
                } else if (!jumlah) { 
                    swal('Maaf!','Kolom Jumlah Jam Harus diisi','warning')
                } else {
                    var html = ''
                    html += '<tr id="obt_'+id+'">'
                    html += '<td id="td_nama_mapel_'+id+'">'+idMapel+'</td>'
                    html += '<td id="td_jumlah_jam_'+id+'">'+jumlah+'</td>'
                    html += '<td>'
                    html += '<a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-warning mr-2" onclick="editMapel(`'+id+'`)"><i class="bx bxs-edit"></i></a>'
                    html += '<a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-danger" onclick="deleteMapel(`'+id+'`)"><i class="bx bxs-trash"></i></a>'
                    html += '</td>'
                    html += '</tr>'

                    html += '<input type="hidden" class="hps_'+id+'" id="rnama_mapel_'+id+'" name="mata_pelajaran[]" value="'+idMapel+'">'
                    html += '<input type="hidden" class="hps_'+id+'" id="rjumlah_jam_'+id+'" name="jumlah_jam[]" value="'+jumlah+'">'

                    $('#tempatData').append(html)
                    $('#mata_pelajaran').val('');
                    $('#jumlah_jam').val('');
                }
            } else {
                swal('Whoops','Mata Pelajaran yang anda pilih sudah pernah diinput','warning')
            }
        } else {
            $('#td_nama_mapel_'+id).html(nama);
            $('#td_jumlah_jam_'+id).html(jumlah);

            $('#rstok_sim_'+id).val(stok_sim);
            $('#rstok_real_'+id).val(stok_real);

            $('#mata_pelajaran').val('');
            $('#jumlah_jam').val('');

            $('#btn-add-stok').html('ADD')
        }
    }
</script>