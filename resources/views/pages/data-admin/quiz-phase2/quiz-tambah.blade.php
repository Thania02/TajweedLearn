<div class="modal-header">
    <h4 class="modal-title">Add Quiz Phase 1</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form method="POST" action="{{ route('quiz_phase2.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputquestion">Question</label>
            <input type="text" class="form-control" id="exampleInputquestion" name="question" placeholder="Input Question" required>
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
            <input type="text" class="form-control" id="exampleInputanswerA" name="answerA" placeholder="Input Answer A" required>
        </div>

        <div class="form-group">
            <label for="exampleInputanswerB">Answer B</label>
            <input type="text" class="form-control" id="exampleInputanswerB" name="answerB" placeholder="Input Answer B" required>
        </div>

        <div class="form-group">
            <label for="exampleInputanswerC">Answer C</label>
            <input type="text" class="form-control" id="exampleInputanswerA" name="answerC" placeholder="Input Answer C" required>
        </div>

        <div class="form-group">
            <label for="exampleInputanswerD">Answer D</label>
            <input type="text" class="form-control" id="exampleInputanswerA" name="answerD" placeholder="Input Answer D" required>
        </div>

        <div class="form-group">
            <label for="exampleInputanswerE">Answer E</label>
            <input type="text" class="form-control" id="exampleInputanswerA" name="answerE" placeholder="Input Answer E" required>
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