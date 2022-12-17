<?php 
    if($this->session->userdata('role') == 'teacher'):
?>
<button class="btn btn-primary position-relative" style="margin-left: 800px; margin-bottom: 200px;">Enrol Subject</button>
<?php 
    endif;
?>
<?php 
    if($this->session->userdata('role') == 'student'):
?>
<button class="btn btn-primary position-relative" style="margin-left: 800px; margin-bottom: 200px;">Creat Subject</button>
<?php 
    endif;
?>