<main class="page-container" id="employees">
    <div class="container">

        
        <h1 class="page-title"><?php echo $title; ?></h1>

        
        <?php if(count($employees)>0): ?>

            <table class="table" style="margin: 1em 0;">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($employees as $employee): ?>
                    <tr>
                        <td><?php echo $employee->name; ?></td>
                        <td><?php echo $employee->code; ?></td>
                        <td><?php echo $employee->salary; ?></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        
        <?php else: ?>

            <p style="margin: 2em 0;">No employees found</p>

        <?php endif; ?>


    </div>
</main>