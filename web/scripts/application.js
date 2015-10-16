/**
 * Created by grzegorzgurzeda on 14.10.15.
 */
$( document ).ready(function()
{
    // Fetch new data...
    $('#fetch-api').click(function ()
    {
        $.get($(this).data('fetch-api'), function(data)
        {
            if (data.status == 'OK')
            {
                $.post('', {action: 'update-data'}, function(data)
                {
                    if (data.status == 'OK')
                    {
                        $('#content-table').html(data.content);
                    }
                    else
                    {
                        // Alert error to user
                        alert(data.content);
                    }
                }, 'json');
            }
            else
            {
                // Alert error to user
                alert(data.content);
            }
        }, 'json');
    });

    // Check voucher...
    $('table').on('click', '.checkbox', function ()
    {
        $.post('', {action: 'check-voucher', 'voucher-id': $(this).val()}, function(data)
        {
            if (data.status == 'OK')
            {
                $('tr[data-voucher="' + data.content + '"]').fadeOut();
            }
            else
            {
                // Alert error to user
                alert(data.content);
            }
        }, 'json');
    });
});