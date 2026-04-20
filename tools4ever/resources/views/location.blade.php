
<?php
use App\Models\location;
?>
@extends('layouts.layout_storage')


@section('title', 'Storage')

@section('header')
    @parent
@endsection

@section('content')
<div class="storage_display">
        <table>
    <tr>
      <th>Location Name</th>
      <th>Create</th>
    </tr>
    <tr>
      <form method="POST" action="location_create" autocomplete="off" >
        <td><input type="text" name="name" minlength="1" maxlength="50"  required="required"></td>
        <td><button type="submit">create</button></td>
      </form>
    </tr>
    </table>
</div>
<div class="storage_display">
      <table>
    <tr>
      <th>Location Id</th>
      <th>Location Name</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    @foreach (location::all() as $location) 
    <tr>
    <form id="edit_{{$location->location_id}}" method="POST" onsubmit="return edit_location_mode(event,'edit_{{$location->location_id}}')" action="location_edit/{{ $location->location_id }}" autocomplete="off">
     <td>{{  $location->location_id}}</td>
     <td id="edit_{{$location->location_id}}_name_text">{{  $location->name}} </td>
     <td id="edit_{{$location->location_id}}_name_input" class="hide"><input type="text" value="{{$location->name}}" name="name"></td>
     <td id="edit_{{$location->location_id}}_edit_button"><button>Edit</button></td>
     <td id="edit_{{$location->location_id}}_confirm_button" class="hide"><button  onclick="confirm_edit('edit_{{$location->location_id}}')">Confirm</button></td>
    </form>     
    <?php
        $linked_count = DB::table("storage")->select("storage_id")->where("location_id", "=" , $location->location_id)->count();
        ?>
      <td>
       <form id="{{$location->location_id}}" method="POST" style="margin: 0;" onsubmit='return submit_delete_location(event,{{$location->location_id}},{{json_encode($location->name)}},{{json_encode($linked_count)}})'  action="location_delete/{{$location->location_id}}">
       <button>Delete</button>
      </form>
      </td>
       </tr>
@endforeach
     </table>
    </div>
    
    
@endsection

@section('footer')
    @parent
@endsection    