/**
 * Dictionary 字典类
 */
function Dictionary() { }

Dictionary.prototype.data = new Array();
// 注意，如果key 是int 型。 就不是字典形式了。 而变成了数组的下标。长度自动根据下标值增长。
Dictionary.prototype.set = function (key, value)
{
    this.data["key_" + key] = value;
};

Dictionary.prototype.get = function (key)
{
    return this.data["key_" + key];
};

Dictionary.prototype.remove = function (key)
{
    this.data["key_" + key] = null;
};

Dictionary.prototype.isEmpty = function ()
{
    return this.size() == 0;
};

Dictionary.prototype.size = function ()
{
    var n = 0;
    for (var key in this.data)
    {
        n++;
    }
    return n;
};

Dictionary.prototype.empty = function ()
{
    this.data = new Array();
};

// 遍历,返回function(key,value)
Dictionary.prototype.each = function (callBack)
{
    for (var key in this.data)
    {
        if (callBack)
        {
            callBack(key, this.data[key]);
        }
    }
};

Dictionary.prototype.toJson = function ()
{
    var array = new Array();
    this.each(function (key, value)
    {
        if (value != null)
        {
            var item = {
                key: null,
                value: null
            }
            item.key = key.substring(4);
            item.value = value;
            array.push(item);
        }
    });

    if (array.length > 0)
    {
        return JSON.stringify(array);
    }
    else
    {
        return null;
    }
};
