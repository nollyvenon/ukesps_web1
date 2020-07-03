<?php require_once '../layouts/feedback_message.php'; ?>
                                
                                <table class="table table-responsive table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Page</th>
                                            <th>Page Location</th>
                                            <th>Title</th>
                                            <th>Info</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($content) && !empty($content)) { foreach ($content as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['page_name']; ?></td>
                                            <td><?php echo $row['page_location']; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo truncate_str($row['info'],300); ?></td>
                                            <td><?php echo $row['entrydate']; ?></td>
                                            <td><a class="btn btn-border green" href="updatecontent.php?action=view&id=<?php echo $row['id']; ?>"><span> <i class="fa fa-edit"></i></span></a>
                                            <a class="btn btn-border dark" href="deletecontent.php?action=view&id=<?php echo $row['id']; ?>"><span><i class="fa fa-trash"></i></span></a></td>
                                        </tr>
                                        <?php } } else { echo "<tr><td colspan='5' class='text-danger'><em>No results to display</em></td></tr>"; } ?>
                                    </tbody>
                                </table>           