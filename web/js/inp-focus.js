function OnFocusInput(id, message)
{
    if(document.getElementById(id).value == message)
        {
            document.getElementById(id).value = '';
        }
}

function OutFocusInput(id, message)
{
    if(document.getElementById(id).value == '')
        {
            document.getElementById(id).value = message;
        }
}