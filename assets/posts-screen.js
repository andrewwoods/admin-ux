
document.addEventListener("DOMContentLoaded", function(event) {

    var titleField = document.getElementById('title');
    titleField.addEventListener('keyup', function(event){

        var currentValue = this.value;
        var maxLength = ( AdminUX.postsTitleMaxLength ) ? AdminUX.postsTitleMaxLength : 55;
        var warningLength = maxLength - 10;
        var currentLength = currentValue.length;

        if (currentLength >= maxLength) {
            if ( ! jQuery(this).hasClass("error") ){
                jQuery(this).addClass("error");
            }
            if ( jQuery(this).hasClass("warning") ){
                jQuery(this).removeClass("warning");
            }
        } else if (currentLength >= warningLength && currentLength < maxLength ) {
            if ( ! jQuery(this).hasClass("warning") ){
                jQuery(this).addClass("warning");
            }
            if ( jQuery(this).hasClass("error") ){
                jQuery(this).removeClass("error");
            }
        } else {
            jQuery(this).removeClass("warning");
            jQuery(this).removeClass("error");
        }
    });
});

