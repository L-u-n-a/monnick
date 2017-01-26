/**
 * Created by jan on 1/26/17.
 */
function toggle_visibility(id) {
    var e = document.getElementById(id);
    if(e.style.display == 'inline')
        e.style.display = 'none';
    else
        e.style.display = 'inline';
}