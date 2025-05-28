import androidx.compose.foundation.background
import androidx.compose.foundation.clickable
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.size
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.ArrowBack
import androidx.compose.material.icons.filled.CalendarToday
import androidx.compose.material.icons.filled.Favorite
import androidx.compose.material.icons.filled.Home
import androidx.compose.material.icons.filled.LocationOn
import androidx.compose.material.icons.filled.Message
import androidx.compose.material.icons.filled.Person
import androidx.compose.material.icons.filled.Settings
import androidx.compose.material3.Card
import androidx.compose.material3.CardDefaults
import androidx.compose.material3.ExperimentalMaterial3Api
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.Scaffold
import androidx.compose.material3.Text
import androidx.compose.material3.TopAppBar
import androidx.compose.material3.TopAppBarDefaults
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.graphics.vector.ImageVector
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp

@OptIn(ExperimentalMaterial3Api::class)
@Composable
fun NotificationScreen() {
    val pinkColor = Color(0xFFFF69B4)

    Scaffold(
        topBar = {
            TopAppBar(
                title = {
                    Text(
                        text = "Thông báo",
                        fontSize = 22.sp,  // Tăng kích thước chữ tiêu đề
                        fontWeight = FontWeight.Bold,
                        color = Color.Black
                    )
                },
                navigationIcon = {
                    IconButton(onClick = { /* Xử lý quay lại */ }) {
                        Icon(
                            imageVector = Icons.Default.ArrowBack,
                            contentDescription = "Back",
                            tint = Color.Black,
                            modifier = Modifier.size(28.dp)  // Tăng kích thước icon
                        )
                    }
                },
                colors = TopAppBarDefaults.topAppBarColors(
                    containerColor = pinkColor
                )
            )
        },
        bottomBar = {
            Row(
                modifier = Modifier
                    .fillMaxWidth()
                    .background(Color.White)
                    .padding(8.dp),
                horizontalArrangement = Arrangement.SpaceAround
            ) {
                IconButton(onClick = { /* Xử lý khi nhấn Home */ }) {
                    Icon(
                        imageVector = Icons.Default.Home,
                        contentDescription = "Home",
                        tint = Color.Black
                    )
                }

                IconButton(onClick = { /* Xử lý khi nhấn Hot Place */ }) {
                    Column(horizontalAlignment = Alignment.CenterHorizontally) {
                        Text(
                            text = "hot",
                            fontSize = 12.sp,
                            color = Color.Red
                        )
                        Text(
                            text = "place",
                            fontSize = 12.sp,
                            color = Color.Black
                        )
                    }
                }

                IconButton(onClick = { /* Xử lý khi nhấn Profile */ }) {
                    Icon(
                        imageVector = Icons.Default.Person,
                        contentDescription = "Profile",
                        tint = Color.Black
                    )
                }

                IconButton(onClick = { /* Xử lý khi nhấn Settings */ }) {
                    Icon(
                        imageVector = Icons.Default.Settings,
                        contentDescription = "Settings",
                        tint = Color.Black
                    )
                }
            }
        }
    ) { paddingValues ->
        Column(
            modifier = Modifier
                .fillMaxSize()
                .padding(paddingValues)
                .background(pinkColor)
                .padding(horizontal = 16.dp, vertical = 16.dp),
            verticalArrangement = Arrangement.SpaceEvenly
        ) {
            // Thông báo 1: Có địa điểm mới được thêm
            NotificationItem(
                icon = Icons.Default.LocationOn,
                text = "Có địa điểm mới được thêm",
                onClick = { /* Xử lý khi nhấn vào thông báo địa điểm mới */ }
            )

            // Thông báo 2: Báo đã bình luận về bài viết của bạn
            NotificationItem(
                icon = Icons.Default.Message,
                text = "Báo đã bình luận về bài viết của bạn",
                onClick = { /* Xử lý khi nhấn vào thông báo bình luận */ }
            )

            // Thông báo 3: Lịch trình của bạn sắp diễn ra
            NotificationItem(
                icon = Icons.Default.CalendarToday,
                text = "Lịch trình của bạn sắp diễn ra",
                onClick = { /* Xử lý khi nhấn vào thông báo lịch trình */ }
            )

            // Thông báo 4: Báo đã thích bài viết của bạn
            NotificationItem(
                icon = Icons.Default.Favorite,
                text = "Báo đã thích bài viết của bạn",
                onClick = { /* Xử lý khi nhấn vào thông báo thích */ }
            )

            // Thêm Spacer để đảm bảo có khoảng trống ở cuối
            Spacer(modifier = Modifier.height(16.dp))
        }
    }
}

@Composable
fun NotificationItem(
    icon: ImageVector,
    text: String,
    onClick: () -> Unit
) {
    Card(
        modifier = Modifier
            .fillMaxWidth()
            .height(80.dp)  // Tăng chiều cao cố định cho card
            .padding(vertical = 8.dp)
            .clip(RoundedCornerShape(8.dp))
            .clickable(onClick = onClick),
        colors = CardDefaults.cardColors(
            containerColor = Color.White
        ),
        shape = RoundedCornerShape(8.dp),
        elevation = CardDefaults.cardElevation(
            defaultElevation = 4.dp  // Thêm đổ bóng để card nổi bật hơn
        )
    ) {
        Row(
            modifier = Modifier
                .fillMaxSize()
                .padding(horizontal = 20.dp, vertical = 16.dp),  // Tăng padding
            verticalAlignment = Alignment.CenterVertically
        ) {
            Icon(
                imageVector = icon,
                contentDescription = null,
                tint = Color.Black,
                modifier = Modifier.size(32.dp)  // Tăng kích thước icon
            )

            Text(
                text = text,
                fontSize = 18.sp,  // Tăng kích thước chữ
                fontWeight = FontWeight.Medium,  // Làm đậm chữ hơn
                color = Color.Black,
                modifier = Modifier.padding(start = 16.dp)  // Tăng khoảng cách giữa icon và text
            )
        }
    }
}

