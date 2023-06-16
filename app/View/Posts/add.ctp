

<div class="card mt-2">
    <div class = "card-header">
        <h5>Add New Post</h5>
    </div>
    <div class="card-body">
        <?=$this->Form->create('Post')?>

        <?=$this->Form->input('title',['class'=>'form-control'])?>
        <?=$this->Form->input('body',['class'=>'form-control'])?>
        <?=$this->Form->button('Submit',['class'=>'btn btn-success btn-block'])?>
        <?=$this->Form->end()?>
    </div>
</div>
