<!DOCTYPE html>
<html lang="en">

<head>
    @include('ui.common.head')

</head>

<body>
    @include('ui.common.header')
    <main>
    @yield("content")

    </main>

    @include('ui.common.footer')
    @include('ui.common.script')
</body>

</html>
