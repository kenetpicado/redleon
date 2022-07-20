@props(['val', 'name', 'old' => ''])

<option value={{ $val }} {{ old($name) == $val || $old == $val ? 'selected' : '' }}>{{ $val }}</option>
