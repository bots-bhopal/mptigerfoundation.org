<!-- Main Footer -->
<footer class="main-footer">
    @if (session('locale') == 'en')
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Copyright&nbsp;&copy;&nbsp;{{date('Y')}}&nbsp;All rights reserved.
        </div>
    @endif

    @if (session('locale') == 'hi')
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            कॉपीराइट&nbsp;&copy;&nbsp;{{date('Y')}}&nbsp;सर्वाधिकार सुरक्षित।
        </div>
    @endif

    <!-- Default to the left -->
    <div class="text-lg-left text-center">
        <strong style="font-weight: 500;">Powered By <a href="https://blueoceantech.in/" target="_blank" style="font-weight: 600;">Blue Ocean Tech Solutions Pvt. Ltd.</a></strong>
    </div>
</footer>
