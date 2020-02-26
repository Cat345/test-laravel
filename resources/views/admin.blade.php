@extends('layouts.app')
<style>
.padding{padding:20px;}
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Панель</div>
								<div class="padding">
									<ul class="list-group ">
										 <?php foreach ($requests as $user): ?>
									  <li class="list-group-item">  <div class="row">
		    								<div class="col-sm-1">
		      							<?php echo $user->id; ?>
		    								</div>
		    								<div class="col-sm-2">
		      							<?php echo $user->subject; ?>
		    								</div>
												<div class="col-sm-2">
		      							<?php echo $user->Message; ?>
		    								</div>
												<div class="col-sm-1">
		      							<?php echo $user->login; ?>
		    								</div>
												<div class="col-sm-2">
		      							<?php echo $user->email; ?>
		    								</div>
												<div class="col-sm-2">
		      							<a href="<?php echo $user->file; ?>" target="_blank">Вложение</a>
		    								</div>
												<div class="col-sm-2">
		      							<?php echo $user->created_at; ?>
		    								</div>
		  									</div>
										</li>
								 <?php endforeach; ?>
									</ul>

	<?php echo $requests->render(); ?>
								</div>



            </div>
        </div>
    </div>
</div>
@endsection
