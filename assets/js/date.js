/* src: http://www.solutionbot.com/2008/06/20/javascript-dateadd-function/ */
Date.prototype.Add = function(strInterval, intIncrement)
{
    if (
            strInterval != "M"
            && strInterval != "D"
            && strInterval != "Y"
            && strInterval != "h"
            && strInterval != "m"
            && strInterval != "uM"
            && strInterval != "uD"
            && strInterval != "uY"
            && strInterval != "uh"
            && strInterval != "um"
            && strInterval != "us"
            )
    {
        throw("DateAdd: Second parameter must be M, D, Y, h, m, uM, uD, uY, uh, um or us");
    }

    if (typeof(intIncrement) != "number")
    {
        throw("DateAdd: Third parameter must be a number");
    }

    switch (strInterval)
    {
        case "M":
            this.setMonth(parseInt(this.getMonth()) + parseInt(intIncrement));
            break;

        case "D":
            this.setDate(parseInt(this.getDate()) + parseInt(intIncrement));
            break;

        case "Y":
            this.setYear(parseInt(this.getYear()) + parseInt(intIncrement));
            break;

        case "h":
            this.setHours(parseInt(this.getHours()) + parseInt(intIncrement));
            break;

        case "m":
            this.setMinutes(parseInt(this.getMinutes()) + parseInt(intIncrement));
            break;

        case "s":
            this.setSeconds(parseInt(this.getSeconds()) + parseInt(intIncrement));
            break;

        case "uM":
            this.setUTCMonth(parseInt(this.getUTCMonth()) + parseInt(intIncrement));
            break;

        case "uD":
            this.setUTCDate(parseInt(this.getUTCDate()) + parseInt(intIncrement));
            break;

        case "uY":
            this.setUTCFullYear(parseInt(this.getUTCFullYear()) + parseInt(intIncrement));
            break;

        case "uh":
            this.setUTCHours(parseInt(this.getUTCHours()) + parseInt(intIncrement));
            break;

        case "um":
            this.setUTCMinutes(parseInt(this.getUTCMinutes()) + parseInt(intIncrement));
            break;

        case "us":
            this.setUTCSeconds(parseInt(this.getUTCSeconds()) + parseInt(intIncrement));
            break;
    }
    return this;
}