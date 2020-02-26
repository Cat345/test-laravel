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
								<div class="card uper">
								<div class="card-body padding">
									@if ($errors->any())
										<div class="alert alert-danger">
											<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
											</ul>
										</div><br />
									@endif
									@if(session()->has('message'))
	    <div class="alert alert-success">
	        {{ session()->get('message') }}
	    </div>
	@endif
<? if($add_allowed!=0){ ?>
										<form method="post" action="{{ route('form.store') }}" enctype="multipart/form-data">
											{{ csrf_field() }}
												<div class="form-group">
														<label for="name">Тема сообщения:</label>
														<input type="text" class="form-control" name="subject"/>
												</div>
												<div class="form-group">
														<label for="price">Сообщение:</label>
														<textarea type="text" class="form-control" name="Message"/></textarea>
												</div>
												<div class="form-group">
														<label for="quantity">Файл:</label>
														<input type="file" class="form-control" name="file"/>
												</div>
												<button type="submit" class="btn btn-primary">Создать заявку</button>
										</form>
										<?}else{?>
											<div class="alert alert-danger">
											Вы уше подали заявку. Следующую можно подать только через 24 часа.
											</div>
											<?}?>
								</div>
								</div>

            </div>
        </div>
    </div>
</div>

@endsection
