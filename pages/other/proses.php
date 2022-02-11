<?php


move_uploaded_file($_FILES['doc']['tmp_name'], "/opt/lampp/htdocs/bamonitoring/assets/uploaded_dokumen/".$_FILES["doc"]["name"])

?>