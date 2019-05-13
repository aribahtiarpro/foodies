<div class="modal fade" id="editkategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route("edit-kategori") }}" enctype="multipart/form-data">
            @csrf
            <input id="edit-id" type="hidden" class="form-control" name="id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama:</label>
            <input id="edit-nama" type="text" class="form-control" name="nama">
          </div>
          <div class="form-group ">
              <label>Image Thumbnail</label>
              <div class="custom-file">
                  <input name="image" type="file" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Jangan dipilih jika tidak ingin mengganti gambar</label>
              </div>
              <div id="imgpreview"></div>
          </div>
          <div class="form-group ">
              <label>Sub Category</label>
              <select id="edit-sub" name="sub" name="category" class="js-example-basic-single form-control">
                  <option value="">Select Category</option>
                  @if ($kategori)
                      @foreach ($kategori as $item)
                          <option value="{{ $item->id}}">{{ $item->nama}}</option>
                      @endforeach
                  @endif
              </select>
          </div>
          
          <div class="form-group">
              <label>Detail</label>
              <textarea id="edit-detail" name="detail" class="form-control"></textarea>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">
                  Simpan
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>