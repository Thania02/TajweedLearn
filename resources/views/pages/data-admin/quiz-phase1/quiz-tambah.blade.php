<div class="modal-header">
    <h4 class="modal-title">Add Quiz Phase 1</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form method="POST" action="{{ route('quiz_phase1.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputquestion">Question</label>
            <input type="text" class="form-control" id="exampleInputquestion" name="question" placeholder="Input question" required>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Input File</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" name="file" id="exampleInputFile">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputanswerA">Answer A</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" name="fileA" id="exampleInputanswerA">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputanswerB">Answer B</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" name="fileB" id="exampleInputanswerB">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputanswerC">Answer C</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" name="fileC" id="exampleInputanswerC">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputanswerA">Answer D</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" name="fileD" id="exampleInputanswerD">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputanswerA">Answer E</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" name="fileE" id="exampleInputanswerE">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputanswerBenar">Correct Answer</label>
            <select class="custom-select rounded-0" id="exampleInputanswerBenar" name="answer_benar" required>
                <option value="">--- Choose Answer ---</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>