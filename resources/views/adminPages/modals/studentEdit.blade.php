
<div class="container-fluid">
    <form action="{{ route('student.update', $student->id) }}" method="post"> 
        @csrf
        @method('PATCH')
        <input type="text" name="id" id="" value="{{ $student->name }}"> 
        <input type="text" name="id" id="" value="{{ $student->email }}"> 
        <input type="text" name="id" id="" value="{{ $student->address }}"> 
        <input type="text" name="id" id="" value="{{ $student->age }}">  
        <input type="submit" value="Save">
    </form>
</div>
