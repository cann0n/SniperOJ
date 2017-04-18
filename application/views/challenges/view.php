<?php
    $this->load->language("challenges");
?>

<h1><?php echo $this->lang->line('CHALLENGES'); ?></h1>

<div class="challenges">
  
  <table class="table" style="font-size: 20px">
    <thead>
      <tr>
        <th><?php echo $this->lang->line('NAME'); ?></th>
        <th><?php echo $this->lang->line('DESCRIPTION'); ?></th>
        <th><?php echo $this->lang->line('SCORE'); ?></th>
        <th><?php echo $this->lang->line('TYPE'); ?></th>
        <th><?php echo $this->lang->line('ONLINE_TIME'); ?></th>
        <th><?php echo $this->lang->line('PASSRATE'); ?></th>
        <th><?php echo $this->lang->line('RESOURCE'); ?></th>
        <th><?php echo $this->lang->line('DOCUMENT'); ?></th>
        <th><?php echo $this->lang->line('SUBMIT'); ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($challenges as $challenge_item): ?>
      <tr>
          <td><?php echo $challenge_item['name']; ?></td>
          <td><?php echo $challenge_item['description']; ?></td>
          <td><?php echo $challenge_item['score']; ?></td>
          <td><?php echo $challenge_item['type']; ?></td>
          <td><?php echo date('Y-m-d H:i:s', $challenge_item['online_time']); ?></td>
          <td><?php echo $challenge_item['solved_times']." / ".$challenge_item['submit_times']; ?></td>
          <?php
            echo '<td>';
            if (strlen($challenge_item['resource']) == 0){
              echo "无";
            }else{
              echo '<a target="_blank" href="';
              echo $challenge_item['resource']; 
              echo '">';
              if (substr($challenge_item['resource'], -1) === "/"){
                echo "链接";
              }else{
                echo "下载";
              }
              echo '</a>';
            }
            echo '</td>';
          ?>  
          
          
          <?php 
            if ($challenge_item['document'] === ""){
              echo '<td>无</td>';
            }else{
              echo '<td><a target="_blank" href="';
              echo $challenge_item['document']; 
              echo '"></td>';
            }
          ?>
          <td>
            <?php
              if ($challenge_item['is_solved'] === 0){
                echo '<form action="/challenges/submit" method="POST">';
                echo '<input type="text" name="flag">';
                echo '<input type="hidden" name="challengeID" value="';
                echo html_escape($challenge_item['challengeID']);
                echo '">';
                echo '<input class="btn btn-default" type="submit">';
                echo '</form>';
              }else{
                echo "Solved";
              }
            ?>
            </td>
      </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>
<a href="SniperOJ{This_IS-A_QIanDAOti}"><a>
