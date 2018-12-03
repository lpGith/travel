var f = {
    exit: function (url) {
        if (!confirm('警告提示:#1000\r\n确定要退出系统吗？\r\n\r\n技术支持：admin@travelzjj.com')) return;

        window.location.href = url;
    },
    box: function (number, message, url) {
        alert('信息提示：#' + number + '\r\n' + message + '\r\n\r\n技术支持：admin@travelzjj.com');
        if (url) {
            window.location.href = url;
        }
    },
    //初始化
    ini: function (flag) {
        //搜索
        $('.nav-search-li').hover(function () {
            $('.searchList').show();
        }, function () {
            $('.searchList').hide();
        })
        $('#search').focus(function () {
            $(this).parent().parent().find('.searchList').hide();
        })

        //导航hover效果
        $('.nav-ul li.nav-li a.nav-a').hover(function () {
            $(this).addClass('nav-cur').parents().siblings().find('a').removeClass('nav-cur');
            $(this).parent().addClass('nav-licur').siblings().removeClass('nav-licur');
        })
        console.log($('.nav-li:eq(0)').position().left);

        var num = $('.nav-li').size();
        for (var i = 0; i < num; i++) {
            $('.subnav_wrap:eq(' + i + ')').addClass('snav-' + i + '');
        }

        $('.subnav_wrap').find('li:last').css('border-right', 'none');

        //打开连接
        $('.t-flink select').change(function () {
            f.openUrl($(this).val())
        });

        //确定默认选择
        if (flag > 0) {
            $('.nav-ul li.nav-li:eq(' + (flag - 1) + ') a.nav-a').addClass('nav-cur').parent().addClass('nav-licur').siblings().removeClass('nav-licur');
        }
    },
    //2.导航菜单样式
    navCurrent: function (idx) {
        $('.nav-menu li:eq(' + (idx - 1) + ') a').addClass('nav-cur');
    },
    userCenterMenu: function (pidx, idx) {
        $('.member-MenuWrap ul:eq(' + (pidx - 1) + ') li:eq(' + (idx - 1) + ') a').addClass('nowCur');
    },
    //打开窗口
    openUrl: function (url) {
        if (url) {
            window.open(url, '_blank');
        }
    }
};

$(function () {
    $('.nav-search-btn1').click(function () {
        if (!$('.nav-searchInput1').val()) {
            alert('关键字不能为空，请填写！');
            return;
        }
        window.location.href = '/search?key=' + $('.nav-searchInput1').val() + '&type=search';
    });
    $('.nav-search-btn').click(function () {
        if (!$('.nav-searchInput').val()) {
            alert('关键字不能为空，请填写！');
            return;
        }
        window.location.href = '/search?key=' + $('.nav-searchInput').val() + '&type=search';
    });
    $('#search').keyup(function () {
        if (event.keyCode == 13) {
            if ($('.nav-search-btn')) $('.nav-search-btn').click();
            if ($('.nav-search-btn1')) $('.nav-search-btn1').click();
        }
    });
});