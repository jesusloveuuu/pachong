# 数据库

## explore


term，趋势等数据源的检索对象。在谷歌趋势里面可能是普通term，topic或者query。不用包里面的说法keyword避免和word歧义。但无论类型是什么，一律认为是同一种数据结构，操作防范也一样。关联的数据结构也一样设计，不设计多套。一般来说，topic全面，query精准，term备选。不过无论什么结果，都是关联到term的。suggestion/explore等字段作为查询结果，初期没有拆表强需求。
topic，mid和title等稳定。可以作为检索方便使用。每个topic都是term，但每个term不一定有topic。title方便阅读考虑可以冗余到term去。快速起见可以把前5位top冗余存储到term表里面去。
geo，长期稳定不变，如果变了，那么老数据也可以更新了，一般没必要单独保存老数据。历史数据可以捞缓存。快速起见可以把前5位冗余存储到term表里面去。复杂的再用关联表。
cache，缓存，key，value。一般永久，偶尔过期。key偶尔加日期。
------
query。没什么关联计算需求和长期存储的必要。值得研究的query已经成为人工word，不值得的也不会研究。一般在结果json里面需要的时候查看。用的包里面作为数组查询，可见对比研究使用频率才高。
time目前没有太多对比研究需求。暂时也不知道如何研究。研究还需要计算函数等等。
------
log日志。可以用cache代替。key加日期即可。git那种每个版本都保存的话，人工没有这个维护能力机器才有这个可能，但是需要回退数据多了很多操作。注意，日志版本是指请求的时间，不是指谷歌趋势的历史数据，例如当前检索2008的数据。
bak备份。人工需要时再创建，复制一个。这个需求并不频繁。手动对老表重命名备份，然后重建空表也可以。人工的在前或者在后加bak_归档或记录对应的日期时间就可以了。
word，词，人工数据。人的语言。英文中文等各种语言。各种方式导入到数据库。和其他机器数据仅字符内容相似，而不关联。不包括mid等数据库用的id，也不必考虑在趋势等数据源里面的形式。物理上应该可以重复，语义上同一个类别语境里面的可以不重复。namespace，命名空间，唯一作为word的语境空间。但是暂时似乎不需要机器管理，自己人工用excel管理，导入到term就可以了。有namespace的是课题。


## 需求

功能设计
米ng.inghang
数据库管理