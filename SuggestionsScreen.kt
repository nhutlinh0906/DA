import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.border
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.aspectRatio
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.size
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.ArrowBack
import androidx.compose.material.icons.filled.Home
import androidx.compose.material.icons.filled.Person
import androidx.compose.material.icons.filled.Settings
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.layout.ContentScale
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.datn.R

@Composable
fun SuggestionsScreen() {
    val pinkColor = Color(0xFFFF69B4)
    val blueColor = Color(0xFF1E90FF)

    Box(
        modifier = Modifier
            .fillMaxSize()
            .background(pinkColor)
    ) {
        Column(
            modifier = Modifier
                .fillMaxSize()
                .padding(16.dp) // Khoảng cách ngoài khung trắng
        ) {
            Spacer(modifier = Modifier.height(16.dp))

            // Header với nút back
            Row(
                modifier = Modifier
                    .fillMaxWidth()
                    .padding(horizontal = 8.dp, vertical = 8.dp),
                verticalAlignment = Alignment.CenterVertically
            ) {
                IconButton(
                    onClick = { /* Xử lý khi nhấn nút quay lại */ }
                ) {
                    Icon(
                        imageVector = Icons.Default.ArrowBack,
                        contentDescription = "Back",
                        tint = Color.Black,
                        modifier = Modifier.size(24.dp)
                    )
                }

                Text(
                    text = "Gợi ý theo sở thích",
                    fontSize = 22.sp,
                    fontWeight = FontWeight.Bold,
                    color = Color.Black,
                    modifier = Modifier.padding(start = 8.dp)
                )
            }

            Spacer(modifier = Modifier.height(16.dp))

            // Nội dung chính có khung trắng bo góc và viền xanh
            Column(
                modifier = Modifier
                    .fillMaxWidth()
                    //.weight(1f)
                    .clip(RoundedCornerShape(16.dp))
                    .background(Color.White)
                    .border(width = 2.dp, color = blueColor, shape = RoundedCornerShape(16.dp))
                    .padding(16.dp) // padding bên trong khung
            ) {
                // Grid categories 2x2
                Row(
                    modifier = Modifier.fillMaxWidth(),
                    horizontalArrangement = Arrangement.spacedBy(8.dp)
                ) {
                    Column(
                        modifier = Modifier.weight(1f),
                        verticalArrangement = Arrangement.spacedBy(8.dp)
                    ) {
                        CategoryItem(
                            imageResId = R.drawable.beach,
                            categoryName = "Bãi biển"
                        )
                        CategoryItem(
                            imageResId = R.drawable.culture,
                            categoryName = "Văn hóa"
                        )
                        CategoryItem(
                            imageResId = R.drawable.culture,
                            categoryName = "Văn hóa"
                        )
                    }
                    Column(
                        modifier = Modifier.weight(1f),
                        verticalArrangement = Arrangement.spacedBy(8.dp)
                    ) {
                        CategoryItem(
                            imageResId = R.drawable.nature,
                            categoryName = "Thiên nhiên"
                        )
                        CategoryItem(
                            imageResId = R.drawable.food,
                            categoryName = "Ẩm thực"
                        )
                        CategoryItem(
                            imageResId = R.drawable.food,
                            categoryName = "Ẩm thực"
                        )
                    }


                }
            }

            Spacer(modifier = Modifier.weight(1f))
        }

        // Bottom navigation
        Row(
            modifier = Modifier
                .fillMaxWidth()
                .height(60.dp)
                .background(Color.White)
                .align(Alignment.BottomCenter),
            horizontalArrangement = Arrangement.SpaceEvenly,
            verticalAlignment = Alignment.CenterVertically
        ) {
            Icon(
                imageVector = Icons.Filled.Home,
                contentDescription = "Home",
                modifier = Modifier.size(28.dp),
                tint = Color.Black
            )
            Icon(
                imageVector = Icons.Filled.Person,
                contentDescription = "Profile",
                modifier = Modifier.size(28.dp),
                tint = Color.Black
            )
            Icon(
                imageVector = Icons.Filled.Settings,
                contentDescription = "Settings",
                modifier = Modifier.size(28.dp),
                tint = Color.Black
            )
        }
    }
}

@Composable
fun CategoryItem(imageResId: Int, categoryName: String) {
    Column(
        horizontalAlignment = Alignment.CenterHorizontally
    ) {
        Image(
            painter = painterResource(id = imageResId),
            contentDescription = categoryName,
            modifier = Modifier
                .fillMaxWidth()
                .aspectRatio(1.5f)
                .clip(RoundedCornerShape(8.dp)),
            contentScale = ContentScale.Crop
        )
        Text(
            text = categoryName,
            fontSize = 18.sp,
            color = Color.Black,
            modifier = Modifier.padding(top = 4.dp, bottom = 8.dp)
        )
    }
}
