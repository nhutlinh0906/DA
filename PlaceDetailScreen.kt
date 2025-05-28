package com.example.datn

import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.border
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.Favorite
import androidx.compose.material.icons.filled.Star
import androidx.compose.material.icons.outlined.ChatBubbleOutline
import androidx.compose.material.icons.outlined.Person
import androidx.compose.material.icons.outlined.Settings
import androidx.compose.material.icons.outlined.Timer
import androidx.compose.material.icons.rounded.StarHalf
import androidx.compose.material.icons.outlined.StarBorder
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
import androidx.compose.ui.tooling.preview.Preview

@Composable
fun PlaceDetailScreen() {
    val pinkColor = Color(0xFFFF69B4)
    val mintGreenColor = Color(0xFF98FB98)

    Box(
        modifier = Modifier
            .fillMaxSize()
            .background(Color.White)
            .padding(8.dp)
    ) {
        Column(
            modifier = Modifier
                .fillMaxSize()
                .border(width = 4.dp, color = pinkColor, shape = RoundedCornerShape(12.dp))
                .clip(RoundedCornerShape(12.dp))
                .background(Color.White)
        ) {
            // Header Image
            Box(
                modifier = Modifier
                    .fillMaxWidth()
                    .height(200.dp)
            ) {
                Image(
                    painter = painterResource(id = R.drawable.nui_ba_den),
                    contentDescription = "Núi Bà Đen",
                    modifier = Modifier.fillMaxSize(),
                    contentScale = ContentScale.Crop
                )
            }

            // Title bar with rating and favorite
            Row(
                modifier = Modifier
                    .fillMaxWidth()
                    .background(mintGreenColor)
                    .padding(horizontal = 12.dp, vertical = 8.dp),
                verticalAlignment = Alignment.CenterVertically,
                horizontalArrangement = Arrangement.SpaceBetween
            ) {
                Text(
                    text = "Núi Bà Đen",
                    fontSize = 18.sp,
                    fontWeight = FontWeight.Bold,
                    color = Color.Black
                )

                Row(
                    verticalAlignment = Alignment.CenterVertically
                ) {
                    // Star rating (chỉnh sửa ở đây)
                    StarRating(rating = 4.5f)

                    Spacer(modifier = Modifier.width(8.dp))

                    // Favorite icon
                    IconButton(
                        onClick = { /* Handle favorite click */ },
                        modifier = Modifier.size(28.dp)
                    ) {
                        Icon(
                            imageVector = Icons.Filled.Favorite,
                            contentDescription = "Favorite",
                            tint = Color.Red
                        )
                    }
                }
            }

            // Description text
            Text(
                text = "Núi Vân Sơn, núi Một\nNúi Bà Đen gắn liền với truyền thuyết về Lý Thiên Hương, một thiếu nữ xinh đẹp, trung hậu, vì trốn tránh kẻ xấu mà gieo mình xuống núi. Sau khi mất, bà thường hiện linh giúp đỡ dân lành, được tôn làm Bà Đen và lập miếu thờ.",
                modifier = Modifier
                    .fillMaxWidth()
                    .weight(1f)
                    .padding(16.dp),
                fontSize = 14.sp,
                color = Color.Black
            )

            // Bottom navigation bar
            Box(
                modifier = Modifier
                    .fillMaxWidth()
                    .background(pinkColor)
                    .padding(vertical = 8.dp)
            ) {
                Row(
                    modifier = Modifier.fillMaxWidth(),
                    horizontalArrangement = Arrangement.SpaceEvenly,
                    verticalAlignment = Alignment.CenterVertically
                ) {
                    // Comment icon
                    Column(horizontalAlignment = Alignment.CenterHorizontally) {
                        Icon(
                            imageVector = Icons.Outlined.ChatBubbleOutline,
                            contentDescription = "Comments",
                            modifier = Modifier.size(24.dp),
                            tint = Color.Black
                        )
                    }

                    // Clock icon
                    Column(horizontalAlignment = Alignment.CenterHorizontally) {
                        Icon(
                            imageVector = Icons.Outlined.Timer,
                            contentDescription = "Time",
                            modifier = Modifier.size(24.dp),
                            tint = Color.Black
                        )
                        Text(text = "hot", fontSize = 12.sp, color = Color.Black)
                        Text(text = "place", fontSize = 12.sp, color = Color.Black)
                    }

                    // Profile icon
                    Column(horizontalAlignment = Alignment.CenterHorizontally) {
                        Icon(
                            imageVector = Icons.Outlined.Person,
                            contentDescription = "Profile",
                            modifier = Modifier.size(24.dp),
                            tint = Color.Black
                        )
                    }

                    // Settings icon
                    Column(horizontalAlignment = Alignment.CenterHorizontally) {
                        Icon(
                            imageVector = Icons.Outlined.Settings,
                            contentDescription = "Settings",
                            modifier = Modifier.size(24.dp),
                            tint = Color.Black
                        )
                    }
                }
            }
        }
    }
}

@Composable
fun StarRating(rating: Float, maxRating: Int = 5, modifier: Modifier = Modifier) {
    Row(modifier = modifier) {
        for (i in 1..maxRating) {
            val icon = when {
                i <= rating -> Icons.Filled.Star
                i - rating in 0.1..0.9 -> Icons.Rounded.StarHalf
                else -> Icons.Outlined.StarBorder
            }

            Icon(
                imageVector = icon,
                contentDescription = "Star $i",
                modifier = Modifier
                    .size(28.dp)
                    .padding(horizontal = 1.dp),
                tint = Color(0xFFFFD700)
            )
        }
    }
}


