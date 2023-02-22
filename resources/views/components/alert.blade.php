@php
if(session()->has($type)) {
    alert(session($type), '', $type)->showConfirmButton('باشه')->autoClose(3000);
}
@endphp
