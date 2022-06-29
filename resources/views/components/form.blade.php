@php
$types = [
  'user' => [
    ['name' => 'name', 'label' => 'First Name', 'type' => 'text'],
    ['name' => 'email', 'label' => 'Email', 'type' => 'email'],
    ['name' => 'password', 'label' => 'Password', 'type' => 'password', 'protect' => true],
    ['name' => 'organization_id', 'label' => 'Organization Id', 'type' => 'number'],
  ],
  'orgUser' => [
    ['name' => 'name', 'label' => 'First Name', 'type' => 'text'],
    ['name' => 'email', 'label' => 'Email', 'type' => 'email'],
    ['name' => 'password', 'label' => 'Password', 'type' => 'password', 'protect' => true],
  ],
  'orgSite' => [
    ['name' => 'name', 'label' => 'First Name', 'type' => 'text'],
  ],
];
$i = 0;
$fields = $types[$type];
if (isset($splitAt)) {
  $split = $splitAt;
} else {
  $split = count($fields) + 1;
}
if (isset($edit)) {
  $edit = $edit;
  if($edit) {
    foreach ($fields as $index=>$field) {
      if (isset($field['protect']) && $field['protect'] == true) {
        unset($fields[$index]);
      }
    }
  }
} else {
  $edit = false;
}
@endphp

<form {{ $attributes->merge(['method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'flex flex-col']) }}>
  @csrf
  @if ($edit)
    @method('PUT')
  @endif
  <div class="flex gap-x-6 flex-col lg:flex-row">
    <div class='mt-4 flex flex-col gap-y-2 justify-between'>
      @foreach ($fields as $field)
        @php
          $fname = $field['name'];
          if($i == $split || $field['type'] == 'textarea') {
            echo "</div><div class='mt-4 flex flex-col gap-y-2 justify-between'>";
          }
          $i++;
        @endphp
        <label class="block flex gap-2 justify-between" for="{{$fname}}-input">
          <span>{{$field['label']}}</span>
          @if ($field['type'] == 'textarea')
            <textarea class="text-red-600 resize focus:outline-red-600 w-80 h-48" name="{{$fname}}" id="{{$fname}}-input">{{ old($fname) ? old($fname) : ($edit ? $model->$fname : "") }}</textarea>
          @elseif ($field['type'] == 'select')
            <select class="text-red-600 focus:outline-red-600" name="{{$fname}}" id="{{$fname}}-input">
              @foreach ($field['options'] as $optionKey => $optionValue)
                <option value="{{$optionKey}}" {{ old($fname) == $optionKey ? 'selected' : ($edit ? ($model->$fname == $optionKey ? 'selected' : '') : '') }}>{{$optionValue}}</option>
              @endforeach
            </select>
          @else
            <input class="text-red-600 focus:outline-red-600" type="{{$field['type']}}" name="{{$fname}}" id="{{$fname}}-input" value="{{ old($fname) ? old($fname) : ($edit ? $model->$fname : "") }}" />
          @endif
        </label>
        @error($fname)
          <span class="-mt-2 self-end text-red-600">{{ $message }}</span>
        @enderror
      @endforeach
    </div>
  </div>
  <div class="w-fit mt-6">
    <x-submit-button>{{ $edit ? "Apply Edit" : "Create" }}</x-submit-button>
  </div>
</form>
