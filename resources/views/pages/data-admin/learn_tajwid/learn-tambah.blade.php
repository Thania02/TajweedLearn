<div class="modal-header">
    <h4 class="modal-title">Add Tajweed Learn</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form method="POST" action="{{ route('learn_tajwid.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputtitle">Titles</label>
            <input type="text" class="form-control" id="exampleInputtitle" name="title" placeholder="Input Titles" required>
        </div>
        <div class="form-group">
            <label for="exampleInputLearn">Type Learn</label>
            <select class="custom-select rounded-0" id="exampleInputLearn" name="type_learn" required>
                <option value="">--- Choose Type ---</option>
                <option value="Qalqalah">Qalqalah</option>
                <option value="Idgham">Idgham</option>
                <option value="Madd">Madd</option>
                <option value="Alif Lam Ma`rifah">Alif Lam Ma`rifah</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputdescription">Description</label>
            <textarea class="form-control" id="exampleInputdescription" rows="4" placeholder="Description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputExample">Input Example</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" multiple name="example[]" id="exampleInputExample">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputLetter">Input Letter</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" multiple name="letter[]" id="exampleInputLetter">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Input Sound</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" name="sound" id="exampleInputFile">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>