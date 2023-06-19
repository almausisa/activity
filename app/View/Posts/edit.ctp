
<div class="card mt-2">
    <div class = "card-header">
        <h5>Update Post</h5>
    </div>
    <div class="card-body">
        
        <?=$this->Form->create('Post')?>
        <?=$this->Form->input('id',['type'=>'hidden'])?>
        <?=$this->Form->input('user_id',['type'=>'hidden'])?>
        <?=$this->Form->input('title',['class'=>'form-control'])?>
        <?=$this->Form->input('body',['class'=>'form-control'])?>
        
        <?=$this->Form->button('Update Post',['class'=>'btn btn-success btn-block'])?>

        <?=$this->Form->end()?>
    </div>
</div>