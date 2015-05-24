@extends('app')
@section('content')

  <table class="table">
    <thead>
		<tr>
			<th>№</th>
			<th>Фамилия</th>
			<th>Имя</th>
			<th>Отчество</th>
			<th>Образование:специальность по диплому</th>
			<th>Должность</th>
			<th>Стаж работы</th>
		</tr>
	</thead>
	<tbody>	
@foreach($articles as $item)
	<tr>
		<td><? echo ++$i;?></td>
		<td>{{$item->soname}}</td>
		<td>{{$item->name}}</td>
		<td>{{$item->second_name}}</td>
		<td>{{$item->eduction}}</td>
		<td>{{$item->post}}</td>
		<td>
		<?try{
			echo LocalizedCarbon::instance($item->exp)->diffForHumans();
		}catch(Exception $e){
			echo 'не указано';
		}?>
		</td>
		




	</tr>			
@endforeach
</tbody>
 </table>
   <div id="paginate">
	{!!$articles->render()!!}
</div>
@stop