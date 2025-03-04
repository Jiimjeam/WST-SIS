
<div class="container-fluid">
    <form action="{{ route('student.update', $student->id) }}" method="post"> 
        @csrf
        @method('PATCH')
        <input type="text" name="name" id="id" value="{{ $student->name }}"> 
        <input type="text" name="email" id="id" value="{{ $student->email }}"> 
        <input type="text" name="address" id="id" value="{{ $student->address }}"> 
        <input type="text" name="age" id="id" value="{{ $student->age }}">  
        <input type="submit" value="Save">
    </form>
</div>
